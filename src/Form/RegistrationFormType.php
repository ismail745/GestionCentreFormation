<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Regex;
use VictorPrdh\RecaptchaBundle\Form\ReCaptchaType;
use Symfony\Component\Form\CallbackTransformer;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('recaptcha', ReCaptchaType::class)
            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passent ne correspondent pas.',
                'options' => ['attr' => ['class' => 'password-field, form-control']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
            ]);

            // Ajouter le champ "roles" seulement si aucun administrateur n'existe
            if (!$options['admin_exists']) {
                $builder->add('roles', ChoiceType::class, [
                    'expanded' => true,
                    'choices' => [
                        'Administrateur' => 'ROLE_ADMIN',
                        'Utilisateur' => 'ROLE_USER',
                    ],
                ]);
            
            // Data transformer pour convertir le string reçu dans le select en array
            $builder->get('roles')
                ->addModelTransformer(new CallbackTransformer(
                function ($rolesArray) {
                    // transform the array to a string
                    return count($rolesArray)? $rolesArray[0]: null;
                },
                function ($rolesString) {
                    // transform the string back to an array
                    return [$rolesString];
                }
            ));
        }else
        {
            $builder->add('roles', ChoiceType::class, [
                'expanded' => true,
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                ],
                'data' => 'ROLE_USER',  // Une seule chaîne ici
                'mapped' => false,
                'disabled' => true, // Le champ est désactivé
            ]);
            
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        // Définir l'option admin_exists
        $resolver->setDefaults([
            'data_class' => User::class,
            'admin_exists' => false, // Valeur par défaut
        ]);
    }
}
