<?php

namespace Simpleweb\SaaSBundle\Form\DataTransformer;

use FOS\UserBundle\Model\UserInterface,
    FOS\UserBundle\Model\UserManagerInterface,
    Symfony\Component\Form\Exception\UnexpectedTypeException,
    Symfony\Component\Form\DataTransformerInterface,
    Symfony\Component\Form\Exception\TransformationFailedException;

class ReferrerTransformer implements DataTransformerInterface
{
    /**
     * @var UserManagerInterface
     */
    protected $user_manager;

    public function __construct(UserManagerInterface $user_manager)
    {
        $this->user_manager = $user_manager;
    }

    /**
     * Transforms a UserInterface instance into a username string.
     *
     * @param UserInterface|null $value UserInterface instance
     *
     * @return string|null Username
     *
     * @throws UnexpectedTypeException if the given value is not a UserInterface instance
     */
    public function transform($value)
    {
        if (null === $value) {
            $transformation = null;
        } elseif (is_string($value)) {
            $transformation = $value;
        } elseif ($value instanceof UserInterface) {
            $transformation = $value->getUsername();
        } else {
            throw new UnexpectedTypeException($value, 'FOS\UserBundle\Model\UserInterface');
        }

        return $transformation;
    }

    /**
     * Transforms a username string into a UserInterface instance.
     *
     * @param string $value Username
     *
     * @return UserInterface the corresponding UserInterface instance
     *
     * @throws UnexpectedTypeException if the given value is not a string
     */
    public function reverseTransform($value)
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        return $this->user_manager->findUserByUsername($value);
    }
}
