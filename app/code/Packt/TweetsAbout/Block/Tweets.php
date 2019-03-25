<?php
    namespace Packt\TweetsAbout\Block; 
    require $_SERVER['DOCUMENT_ROOT']."/packt/app/Packt/TweetsAbout/Api/vendor/autoload.php"; 
    use Abraham\TwitterOAuth\TwitterOAuth; 

    class Tweets extends \Magento\Framework\View\Element\Template {
        private $consumerKey; 
        private $consumerSecret; 
        private $accessToken; 
        private $accessTokenSecret;
        
        public function searchTweets(){
            $connection = $this->twitterDevAuth();
            $result = $connection->get("search/tweets", array("q" =>$this->getData('hashtag'), "result_type"=>"recent", "count" => 10));
            return $result->statuses;
        }

        private function twitterDevAuth() {
            $this->consumerKey = Nq5MQR2IsSbCNUkdgTLyZXteG;
            $this->consumerSecret = Qo6ZGQTaEvOiR2Kzc8qAQOkgwhZehG2eNPgtO3qB8jv1HNpiPW;
            $this->accessToken = 426913692-3gyoONdT3U1DYUYwpoWYN0vXKpEKIxCLa5wDoZFi;
            $this->accessTokenSecret = N7cfVNw1QcVmfPCMMJdXBJjBAnkYeRiAVPII6ffKp6Y1l; 

            return new TwitterOAuth($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret); 
        }
    }