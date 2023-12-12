<?php

namespace App\Factory;

use App\Entity\TipoPregunta;
use App\Repository\TipoPreguntaRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<TipoPregunta>
 *
 * @method        TipoPregunta|Proxy create(array|callable $attributes = [])
 * @method static TipoPregunta|Proxy createOne(array $attributes = [])
 * @method static TipoPregunta|Proxy find(object|array|mixed $criteria)
 * @method static TipoPregunta|Proxy findOrCreate(array $attributes)
 * @method static TipoPregunta|Proxy first(string $sortedField = 'id')
 * @method static TipoPregunta|Proxy last(string $sortedField = 'id')
 * @method static TipoPregunta|Proxy random(array $attributes = [])
 * @method static TipoPregunta|Proxy randomOrCreate(array $attributes = [])
 * @method static TipoPreguntaRepository|RepositoryProxy repository()
 * @method static TipoPregunta[]|Proxy[] all()
 * @method static TipoPregunta[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static TipoPregunta[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static TipoPregunta[]|Proxy[] findBy(array $attributes)
 * @method static TipoPregunta[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static TipoPregunta[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class TipoPreguntaFactory extends ModelFactory
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
            'Tipo' => self::faker()->text(25),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(TipoPregunta $tipoPregunta): void {})
        ;
    }

    protected static function getClass(): string
    {
        return TipoPregunta::class;
    }
}
