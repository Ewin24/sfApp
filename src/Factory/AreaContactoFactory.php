<?php

namespace App\Factory;

use App\Entity\AreaContacto;
use App\Repository\AreaContactoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<AreaContacto>
 *
 * @method        AreaContacto|Proxy create(array|callable $attributes = [])
 * @method static AreaContacto|Proxy createOne(array $attributes = [])
 * @method static AreaContacto|Proxy find(object|array|mixed $criteria)
 * @method static AreaContacto|Proxy findOrCreate(array $attributes)
 * @method static AreaContacto|Proxy first(string $sortedField = 'id')
 * @method static AreaContacto|Proxy last(string $sortedField = 'id')
 * @method static AreaContacto|Proxy random(array $attributes = [])
 * @method static AreaContacto|Proxy randomOrCreate(array $attributes = [])
 * @method static AreaContactoRepository|RepositoryProxy repository()
 * @method static AreaContacto[]|Proxy[] all()
 * @method static AreaContacto[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static AreaContacto[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static AreaContacto[]|Proxy[] findBy(array $attributes)
 * @method static AreaContacto[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static AreaContacto[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class AreaContactoFactory extends ModelFactory
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
            'Nombre' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(AreaContacto $areaContacto): void {})
        ;
    }

    protected static function getClass(): string
    {
        return AreaContacto::class;
    }
}
