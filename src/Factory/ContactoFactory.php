<?php

namespace App\Factory;

use App\Entity\Contacto;
use App\Repository\ContactoRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Contacto>
 *
 * @method        Contacto|Proxy create(array|callable $attributes = [])
 * @method static Contacto|Proxy createOne(array $attributes = [])
 * @method static Contacto|Proxy find(object|array|mixed $criteria)
 * @method static Contacto|Proxy findOrCreate(array $attributes)
 * @method static Contacto|Proxy first(string $sortedField = 'id')
 * @method static Contacto|Proxy last(string $sortedField = 'id')
 * @method static Contacto|Proxy random(array $attributes = [])
 * @method static Contacto|Proxy randomOrCreate(array $attributes = [])
 * @method static ContactoRepository|RepositoryProxy repository()
 * @method static Contacto[]|Proxy[] all()
 * @method static Contacto[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Contacto[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Contacto[]|Proxy[] findBy(array $attributes)
 * @method static Contacto[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Contacto[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ContactoFactory extends ModelFactory
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
            'Apellido' => self::faker()->text(255),
            'Celular' => self::faker()->text(255),
            'Correo' => self::faker()->text(255),
            'Mensaje' => self::faker()->text(255),
            'Nombre' => self::faker()->text(255),
            'fk_AreaContacto' => AreaContactoFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Contacto $contacto): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Contacto::class;
    }
}
