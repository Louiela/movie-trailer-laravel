<?php

namespace App\Http\Controllers;

use Request;
use App\htttp\Requests;
use View;
use GuzzleHttp\Client;

class MovieController extends Controller
{
	public function index() {
		$client = new Client();

		/** Get movie details */
		$m_details = $client->get('https://api.themoviedb.org/3/movie/'.Request::segment(2), [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		$json_details = json_decode($m_details);

		/** Get movie videos*/
		$m_videos = $client->get('https://api.themoviedb.org/3/movie/'.Request::segment(2).'/videos', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		/** Get images videos*/
		$m_images = $client->get('https://api.themoviedb.org/3/movie/'.Request::segment(2).'/images', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		/** Get images videos*/
		$m_reviews = $client->get('https://api.themoviedb.org/3/movie/'.Request::segment(2).'/reviews', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();

		/** Get cast*/
		$m_cast = $client->get('https://api.themoviedb.org/3/movie/'.Request::segment(2).'/credits', [
			'form_params'	=> [
				'api_key'	=> 'c4bc072c5243b580f3d5f839cdce12ed'
			]
		])->getBody();
		

		/** Get official trailer video*/
		$json_videos = json_decode($m_videos)->results;
		foreach ($json_videos as $item) {
			if($item->type == 'Trailer') {
				$o_trailer = $item->key;
				break;
			}
		}

		return view('blade.movie')
			->with(array(
				'baseurl'	=>	url('http://127.0.0.1:8000/'),
				'm_details'	=>	json_encode($json_details),
				'o_trailer'	=>	$o_trailer,
				'm_videos'	=>	json_encode($json_videos),
				'm_images'	=>	json_encode(json_decode($m_images)->backdrops),
				'm_reviews'	=>	json_encode(json_decode($m_reviews)->results),
				'm_cast'	=>	json_encode(json_decode($m_cast)->cast),
				'm_crew'	=>	json_encode(json_decode($m_cast)->crew),
				'm_genres'	=>	json_encode($json_details->genres)
			));
	}
}
