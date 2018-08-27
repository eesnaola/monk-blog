<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelType;


class PostAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('body', TextareaType::class);
        $formMapper->add('tags', ModelType::class, array(
            'by_reference' => 'false',
            'multiple' => true,
            'class' => 'App\Entity\Tag',
            'required' => true,
            'btn_add' => true
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
        $datagridMapper->add('body');
    }

    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->add('date');
        $showMapper->add('title');
        $showMapper->add('body');
        $showMapper->add('tags', 'null', array(
            'template' => 'post/tag_field.html.twig'
        ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('date');
        $listMapper->addIdentifier('title');
        $listMapper->add('_action', null, array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ));
    }

    public function prePersist($post)
    {
        $user = $this->getConfigurationPool()->getContainer()->get('security.token_storage')->getToken()->getUser();
        $post->setUser($user);
    }
}