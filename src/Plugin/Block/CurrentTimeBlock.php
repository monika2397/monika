<?php

namespace Drupal\specbee_assignment\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Current Time based on selected Timezone' Block.
 *
 * @Block(
 *   id = "current_time_block",
 *   admin_label = @Translation("Current Time Block"),
 * )
 */
class CurrentTimeBlock extends BlockBase
{

    /**
     * {@inheritdoc}
     */
    public function build()
    {
     
      $config = \Drupal::config('adminconfig_form.settings');
      $selected_time = $config->get('timezone');
      $country = $config->get('country');
      $city = $config->get('city');
      $data = \Drupal::service('specbee_assignment.custom_services')->getTimezone($config->get('timezone'));
      $ads_html = '<p><b>Country: </b>' .$country. '</p><p><b>City: </b>' .$config->get('city'). '</p><p><b>Time: </b>' .$data. '</p>';
      // return ['#markup' => $ads_html];

      $render = [
          '#theme'      => 'current_time_block',
          '#current_time' => $ads_html,
      ];

      return $render;

    } //end build()

    /**
     * @return integer
     */
    public function getCacheMaxAge()
    {
        return 0;

    } //end getCacheMaxAge()

} //end class
