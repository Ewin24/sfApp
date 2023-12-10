<?php

namespace App\Factory;

use App\Entity\Pregunta;
use App\Repository\PreguntaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Pregunta>
 *
 * @method        Pregunta|Proxy create(array|callable $attributes = [])
 * @method static Pregunta|Proxy createOne(array $attributes = [])
 * @method static Pregunta|Proxy find(object|array|mixed $criteria)
 * @method static Pregunta|Proxy findOrCreate(array $attributes)
 * @method static Pregunta|Proxy first(string $sortedField = 'id')
 * @method static Pregunta|Proxy last(string $sortedField = 'id')
 * @method static Pregunta|Proxy random(array $attributes = [])
 * @method static Pregunta|Proxy randomOrCreate(array $attributes = [])
 * @method static PreguntaRepository|RepositoryProxy repository()
 * @method static Pregunta[]|Proxy[] all()
 * @method static Pregunta[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Pregunta[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Pregunta[]|Proxy[] findBy(array $attributes)
 * @method static Pregunta[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Pregunta[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class PreguntaFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'Correcto' => self::faker()->boolean(),
            'Pregunta' => self::faker()->text(255),
            'Respuesta' => self::faker()->text(255),
            'fk_Evaluacion' => EvaluacionFactory::new(),
            'fk_Tipo_Pregunta' => TipoPreguntaFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Pregunta $pregunta): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Pregunta::class;
    }
}
