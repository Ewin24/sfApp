<?php

namespace App\Factory;

use App\Entity\Estudiante;
use App\Repository\EstudianteRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Estudiante>
 *
 * @method        Estudiante|Proxy create(array|callable $attributes = [])
 * @method static Estudiante|Proxy createOne(array $attributes = [])
 * @method static Estudiante|Proxy find(object|array|mixed $criteria)
 * @method static Estudiante|Proxy findOrCreate(array $attributes)
 * @method static Estudiante|Proxy first(string $sortedField = 'id')
 * @method static Estudiante|Proxy last(string $sortedField = 'id')
 * @method static Estudiante|Proxy random(array $attributes = [])
 * @method static Estudiante|Proxy randomOrCreate(array $attributes = [])
 * @method static EstudianteRepository|RepositoryProxy repository()
 * @method static Estudiante[]|Proxy[] all()
 * @method static Estudiante[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Estudiante[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Estudiante[]|Proxy[] findBy(array $attributes)
 * @method static Estudiante[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Estudiante[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class EstudianteFactory extends ModelFactory
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
            'Apellido' => self::faker()->text(8),
            'Nombre' => self::faker()->text(7),
            'fk_Cursos' => CursoFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Estudiante $estudiante): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Estudiante::class;
    }
}
