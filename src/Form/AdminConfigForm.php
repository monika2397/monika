<?php

namespace Drupal\specbee_assignment\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class AdminConfigForm extends ConfigFormBase
{

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames()
    {
        return ['adminconfig_form.settings'];

    } //end getEditableConfigNames()

    /**
     * {@inheritdoc}
     */
    public function getFormId()
    {
        return 'specbee_admin_form';

    } //end getFormId()

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state)
    {
        $config = $this->config('adminconfig_form.settings');

        $form['country'] = [
            '#type'  => 'textfield',
            '#title' => t('Country'),
            '#description'   => 'Please enter the Country',
            '#default' => $config->get('country'),
        ];

        $form['city'] = [
            '#type'  => 'textfield',
            '#title' => t('City'),
            '#description'   => 'Please enter the City',
            '#default' => $config->get('city'),
        ];
        
        $form['timezone'] =[
            '#type' => 'select',
            '#title' => t('Select Timezone'),
            '#default' => $config->get('timezone'),
            '#options' => [
                'Select' => t('Options in the select list'),
                'America/Chicago' => t('America/Chicago'),
                'options' => t('America/New_York'),
                'Asia/Tokyo' => t('Asia/Tokyo'),
                'Asia/Dubai' => t('Asia/Dubai'),
                'Asia/Kolkata' => t('Asia/Kolkata'),
                'Europe/Amsterdam' => t('Europe/Amsterdam'),
                'Europe/Oslo' => t('Europe/Oslo'),
                'Europe/London' => t('Europe/London'),
            ],
        ];
        return parent::buildForm($form, $form_state);

    } //end buildForm()

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state)
    {
        $config = $this->config('adminconfig_form.settings');
        $config->set('country' ,$form_state->getValue('country'));
        $config->set('city', $form_state->getValue('city'));
        $config->set('timezone', $form_state->getValue('timezone'));
        $config->save();
    }

} //end class
