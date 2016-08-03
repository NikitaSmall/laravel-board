<?php
	
namespace App\Api;

class OpenWeather
{
	protected $parsedData;

	public function __construct($cityName)
	{
		$apiKey = env('OPEN_WEATHER_API_KEY');

		$result = $this->makeRequest($apiKey, $cityName);
		$this->parsedData = json_decode($result);
	}

	protected function makeRequest($apiKey, $cityName)
	{
		return file_get_contents($this->makeUrl($apiKey, $cityName));
	}

	protected function makeUrl($apiKey, $cityName)
	{
		return 'http://api.openweathermap.org/data/2.5/weather?q=' . $cityName . '&APPID=' . $apiKey . '&units=metric';
	}

	public function temp()
	{
		return $this->parsedData->main->temp;
	}

	public function icon()
	{
		return $this->parsedData->weather[0]->main;
	}
}