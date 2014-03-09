<?php

class UUIDController extends BaseController {

	public function uuid($username)
	{

		$ch         = curl_init();
		$curlConfig = array(
			CURLOPT_URL            => "https://api.mojang.com/profiles/page/1",
			CURLOPT_POST           => true,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS     => '{
                    "name": "' . $username . '",
					"agent": "minecraft"
				}',
			CURLOPT_HTTPHEADER     => array(
				'Content-Type: application/json',
			),
		);
		curl_setopt_array($ch, $curlConfig);
		$json = curl_exec($ch);
		curl_close($ch);


		$response = Response::make($json);
		$response->header('Content-Type', "json");

		return $response;
	}

}