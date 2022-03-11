<?php

namespace Drupal\specbee_assignment;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Datetime\DateFormatter;

/**
 * Class CurrentTime
 * @package Drupal\specbee_assignment\CurrentTime
 */
class CurrentTime {

  protected $currentTime;
  protected $currentDate;


  /**
   * CustomService constructor.
   * @param TimeInterface $currentTime
   * @param DateFormatter $DateFormatter
   */
  public function __construct(TimeInterface $currentTime,DateFormatter $currentDate) {
    $this->currentTime = $currentTime;
    $this->currentDate = $currentDate;
  }


  /**
   * @return \Drupal\Component\Render\MarkupInterface|string
   */
  public function getTimezone($timezone= '') {
    $timezone = $this->currentDate->format($this->currentTime->getRequestTime(), 'custom','jS M Y - g:i A', $timezone);
    return $timezone;
  }

}