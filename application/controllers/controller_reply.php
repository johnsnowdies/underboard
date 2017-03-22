<?php
class Controller_Reply extends Controller
{
    function __construct()
    {
        $this->model   = new Model_Reply();
        $this->view    = new View();
        $this->request = new Request();
    }
	
    function getExtension($str) {
    	$i = strrpos($str,".");
    	if (!$i) { return ""; }
    	$l = strlen($str) - $i;
    	$ext = substr($str,$i+1,$l);
    	return $ext;
    }
    
    function action_index()
    {
    			$error = false;	
        		if (empty($this->request->post->author) || empty($this->request->post->body)) 
        			$error = true;
        	
        		$title = $this->request->post->title;
        		
        		if (empty($this->request->post->title))
        		{
        			if($this->request->post->parent) 
        				$title = "комментарий:";
        			else
        				$error = true;
        		}
				
        		if (!$error){
                	if ($this->request->files->inputImage->size > 0){
                    	$fileName = $this->request->files->inputImage->name;
                    	$tmpName  = $this->request->files->inputImage->tmp_name;
                    	$fileSize = $this->request->files->inputImage->size;
                    	$fileType = $this->request->files->inputImage->type;
                    	$extension = $this->getExtension($fileName);
                    	$extension = strtolower($extension);
                    	
                   		$fp      = fopen($tmpName, 'r');
                   		$content = fread($fp, $fileSize);
                   		fclose($fp);
                    		
                   	    $thumb = PhpThumbFactory::create($tmpName);
                   		$thumb->resize(400);

                        $tmpThumb = $_SERVER['DOCUMENT_ROOT'].'/public/uploads/thumbs/'.rand(1000000, 3500000).'.jpg';
                        $thumb->save($tmpThumb, 'jpg');

                        $fp      = fopen($tmpThumb, 'r');
                        $thumb = fread($fp, filesize($tmpThumb));


                        fclose($fp);

                        //unlink($tmpThumb);


                    		
                        $this->model->insert_Reply($title, $this->request->post->body, $this->request->post->author, $this->request->post->parent,$thumb,$content,$extension );
                	}
                	else{
                        $this->model->insert_Reply($title, $this->request->post->body, $this->request->post->author, $this->request->post->parent);
                    }
                



            	    if (!$this->request->post->parent) 
                		header('Location: /');
                	else
                    	header('Location: /thread/show/' . $this->request->post->parent);

        		}
        		else
        			header('Location: /404');
    }
}