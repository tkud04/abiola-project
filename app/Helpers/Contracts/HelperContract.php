<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmailSMTP($data,$view,$type);
        public function createUser($data);
        public function createUserData($data);
        public function createBankAccount($data);
        public function addTracking($data);
        public function addTrackingHistory($data);
        public function addShipper($data);
        public function addReceiver($data);
        public function getTrackings();
        public function getTracking($tnum);
        public function getTrackingHistory($tnum);
        public function getShipper($tnum);
        public function getReceiver($tnum);
		public function track($tnum);
        public function getSetting($i);
        public function getUser($email);
        public function getUsers();
        public function updateUser($data);
        public function updateProfile($user, $data);
        public function getBankAccount($user);
        public function updateBankAccount($user,$data);
        public function updateConfig($data);
        public function getDashboard($user);
        public function addSmtpConfig($data);
        public function getSmtpConfig();
        public function hasKey($arr,$key);
        public function updateSmtpConfig($data);
        public function bomb($data);
        public function getTNum();
        public function getConfig($id,$config);
        public function getConfigs($id);
       
		
}
 ?>