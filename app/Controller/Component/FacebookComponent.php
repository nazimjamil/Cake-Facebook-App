<?php

App::uses('Component', 'Controller');

	class FacebookComponent extends Component {
		public function initialize(Controller $controller) {
			/* Straight out of the PHP SDK */
        	require 'facebook' . DS . 'facebook.php';
			$facebook = new Facebook(array(
				'appId'  => Configure::read('facebook.appId'),
				'secret' => Configure::read('facebook.appSecret'),
				'cookie' => true
			));
		$user = $facebook -> getUser();
		if ($user) {
		try {
				$user_profile = $facebook -> api('/me');
				$signed_request = $facebook -> getSignedRequest();
			} catch (FacebookApiException $e) {
				CakeLog::write('FacebookApi', $e);
				$user = null;
			}
		}
		if ($user) {
			$logoutUrl = $facebook -> getLogoutUrl();
		} else {
			$loginUrl = $facebook -> getLoginUrl(
				array(
					'scope' => '',
					'redirect_uri' => Configure::read('facebook.pageTabUrl')
					)
				);
			// Enforced permissions
			echo '<script type="text/javascript">top.window.location.replace ("' . $loginUrl . '")</script>';
			CakeLog::write('FacebookApi', 'User being redirected to permissions dialouge');
		}
    	}

    	public function liked() {
			if (!empty($_REQUEST['signed_request'])) {
				$signedRequest = $_REQUEST['signed_request'];
				list($sig, $payload) = explode('.', $signedRequest, 2);
				$data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);
			}
			if (empty($data['page']['liked'])) {
				return false;
			} else {
				return true;
			}
    	}
	}