<?php 

namespace Controller;


use \Respect\Validation\Validator as v;


class AjaxController extends \W\Controller\Controller 
{
	
	public function validateContactRequest()
	{


		if(!empty($_POST)){

			$post = array_map('trim', array_map('strip_tags', $_POST));

			$errors = [
				(!v::in(['yes', 'no'])->validate($post['choice'])) ? 'Le choix est invalide' : null,
				(!v::intVal()->validate((int) $post['id_contact'])) ? 'L\'id contact est invalide' : null,
			];

			$errors = array_filter($errors);


			if(count($errors) === 0){

				// 2 => accept | 1 => decline
				$data = [
					'groom_accept' => ($post['choice'] == 'yes') ? 2 : 1,
				];

				$contactRequestModel = new \Model\ContactRequestsModel();
				$update = $contactRequestModel->update($data, (int) $post['id_contact']);
				$contactRequestModel->recalcNotif($this->getUser()['id']);

				if($update){

					$message = ($post['choice'] == 'yes') ? 'Votre avez accepté d\'être contacté par le propriétaire ' : 'Vous avez refusé parce que vous êtes un tocard ';
					$json = [
						'code' 		=> true,
						'message' 	=> '<div class="text-success">'.$message.'</div>',
						'nbNotifs'	=> $contactRequestModel->totalNotifications,
					];
				}
				else {
					// En théorie on devrait pas arriver ici 
				}
			}
			else {
				$json = [
						'code' 		=> false,
						'message' 	=> '<div class="text-danger">'.implode(',', $errors).'</div>',
						'nbNotifs'	=> $contactRequestModel->totalNotifications,
				];

			}
		}

		$this->showJson($json);
	}



	public function confirmJobByOwner()
	{
		if(!empty($_POST)){

			$post = array_map('trim', array_map('strip_tags', $_POST));

			$errors = [
				(!v::intVal()->validate((int) $post['id_contact_request'])) ? 'L\'id contact est invalide' : null,
			];

			$errors = array_filter($errors);


			if(count($errors) === 0){
				$data = [
					'owner_confirm' => 1,
				];
				$contactRequestModel = new \Model\ContactRequestsModel();
				$update = $contactRequestModel->update($data, (int) $post['id_contact_request']);

				if($update){
					$json = [
						'code' 		=> true,
						'message' 	=> '<div class="text-success">Merci pour votre confirmation</div>',
						'nbNotifs'	=> $contactRequestModel->totalNotifications,
					];
				}
				else {
					// En théorie on arrive pas ici..
				}
			}
			else {
				// S'il y a des erreurs
				$json = [
					'code' 		=> false,
					'message' 	=> '<div class="text-danger">'.implode(', ', $errors).'</div>',
					'nbNotifs'	=> $contactRequestModel->totalNotifications,
				];

			}


			$this->showJson($json);
		}
	}


	public function confirmJobByGroom()
	{

	}
}