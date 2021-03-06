<?php
namespace Victoire\Widget\ConnectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Traits\LinkTrait;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetConnect
 *
 * @ORM\Table("vic_widget_connect")
 * @ORM\Entity
 */
class WidgetConnect extends Widget
{
    use LinkTrait;

    const PREFIX_RESOURCE_OWNER_FORM_LABEL = 'widget_connect.form.resource_owner.';
    const PREFIX_RESOURCE_OWNERS_FORM_LABEL = 'widget_connect.form.resource_owners.';
    const PREFIX_RESOURCE_OWNER_LABEL = 'resource_owner_';
    const PREFIX_RESOURCE_OWNER_TEMPLATE = 'resource_owner_template_';
    const SESSION_REDIRECT_URL = 'victoire.widget.connect.redirect_url';
    const EVENT_BEFORE_LOGIN = 'victoire.widget.connect.before_login';
    const EVENT_BEFORE_HWI_LOGIN = 'victoire.widget.connect.before_hwi_login';
    const EVENT_AFTER_LOGIN_FAILURE = 'victoire.widget.connect.after_login_failure';
    const EVENT_AFTER_LOGIN_SUCCESS = 'victoire.widget.connect.after_login_success';
    const EVENT_AFTER_LOGOUT = 'victoire.widget.connect.after_logout';

    /**
     * @var boolean
     *
     * @ORM\Column(name="form_login", type="boolean")
     */
    protected $formLogin;

    /**
     * @var array
     *
     * @ORM\Column(name="resource_owners", type="array", nullable=true)
     */
    protected $resourceOwners;

    public function __construct() {
        parent::__construct();
        $this->formLogin = true;
    }

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     *
     * @return String
     */
    public function __toString()
    {
        return 'Connect #'.$this->id;
    }

    /**
     * @return boolean
     */
    public function isFormLogin()
    {
        return $this->formLogin;
    }

    /**
     * @param boolean $formLogin
     */
    public function setFormLogin($formLogin)
    {
        $this->formLogin = $formLogin;
    }

    /**
     * @return array
     */
    public function getResourceOwners()
    {
        return $this->resourceOwners;
    }

    /**
     * @param array $resourceOwners
     * @return $this
     */
    public function setResourceOwners($resourceOwners)
    {
        $this->resourceOwners = $resourceOwners;

        return $this;
    }
}
