<?php

namespace App\Factory;

use App\Entity\Evaluacion;
use App\Repository\EvaluacionRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Evaluacion>
 *
 * @method        Evaluacion|Proxy create(array|callable $attributes = [])
 * @method static Evaluacion|Proxy createOne(array $attributes = [])
 * @method static Evaluacion|Proxy find(object|array|mixed $criteria)
 * @method static Evaluacion|Proxy findOrCreate(array $attributes)
 * @method static Evaluacion|Proxy first(string $sortedField = 'id')
 * @method static Evaluacion|Proxy last(string $sortedField = 'id')
 * @method static Evaluacion|Proxy random(array $attributes = [])
 * @method static Evaluacion|Proxy randomOrCreate(array $attributes = [])
 * @method static EvaluacionRepository|RepositoryProxy repository()
 * @method static Evaluacion[]|Proxy[] all()
 * @method static Evaluacion[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Evaluacion[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Evaluacion[]|Proxy[] findBy(array $attributes)
 * @method static Evaluacion[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Evaluacion[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class EvaluacionFactory extends ModelFactory
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
            'Asignatura' => self::faker()->text(55),
            'Calificacion' => self::faker()->randomDigit(),
            'Fecha' => self::faker()->dateTime(),
            'fk_Cursos' => CursoFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Evaluacion $evaluacion): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Evaluacion::class;
    }
}
