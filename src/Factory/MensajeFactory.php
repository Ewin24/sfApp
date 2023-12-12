<?php

namespace App\Factory;

use App\Entity\Mensaje;
use App\Repository\MensajeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Mensaje>
 *
 * @method        Mensaje|Proxy create(array|callable $attributes = [])
 * @method static Mensaje|Proxy createOne(array $attributes = [])
 * @method static Mensaje|Proxy find(object|array|mixed $criteria)
 * @method static Mensaje|Proxy findOrCreate(array $attributes)
 * @method static Mensaje|Proxy first(string $sortedField = 'id')
 * @method static Mensaje|Proxy last(string $sortedField = 'id')
 * @method static Mensaje|Proxy random(array $attributes = [])
 * @method static Mensaje|Proxy randomOrCreate(array $attributes = [])
 * @method static MensajeRepository|RepositoryProxy repository()
 * @method static Mensaje[]|Proxy[] all()
 * @method static Mensaje[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Mensaje[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Mensaje[]|Proxy[] findBy(array $attributes)
 * @method static Mensaje[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Mensaje[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class MensajeFactory extends ModelFactory
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
            'Correo' => self::faker()->text(100),
            'FechaEnvio' => self::faker()->dateTime(),
            'Mensaje' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Mensaje $mensaje): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Mensaje::class;
    }
}
