<?php declare(strict_types=1);

namespace Gos\Bundle\WebSocketBundle\Client;

use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

interface ClientManipulatorInterface
{
    /**
     * @return array<int, array{client: TokenInterface, connection: ConnectionInterface}>
     */
    public function findAllByUsername(Topic $topic, string $username): array;

    /**
     * @return array<int, array{client: TokenInterface, connection: ConnectionInterface}>
     */
    public function findByRoles(Topic $topic, array $roles): array;

    /**
     * @return array{client: TokenInterface, connection: ConnectionInterface}|bool
     *
     * @deprecated to be removed in 3.0. Use findAllByUsername() instead.
     */
    public function findByUsername(Topic $topic, string $username);

    /**
     * @return array<int, array{client: TokenInterface, connection: ConnectionInterface}>
     */
    public function getAll(Topic $topic, bool $anonymous = false): array;

    public function getClient(ConnectionInterface $connection): TokenInterface;

    /**
     * @return string|object
     */
    public function getUser(ConnectionInterface $connection);
}
