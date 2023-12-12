<?php

namespace App\Factory;

use App\Entity\Curso;
use App\Repository\CursoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Curso>
 *
 * @method        Curso|Proxy create(array|callable $attributes = [])
 * @method static Curso|Proxy createOne(array $attributes = [])
 * @method static Curso|Proxy find(object|array|mixed $criteria)
 * @method static Curso|Proxy findOrCreate(array $attributes)
 * @method static Curso|Proxy first(string $sortedField = 'id')
 * @method static Curso|Proxy last(string $sortedField = 'id')
 * @method static Curso|Proxy random(array $attributes = [])
 * @method static Curso|Proxy randomOrCreate(array $attributes = [])
 * @method static CursoRepository|RepositoryProxy repository()
 * @method static Curso[]|Proxy[] all()
 * @method static Curso[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Curso[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Curso[]|Proxy[] findBy(array $attributes)
 * @method static Curso[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Curso[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class CursoFactory extends ModelFactory
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
            'Nombre' => self::faker()->text(10),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Curso $curso): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Curso::class;
    }
}
