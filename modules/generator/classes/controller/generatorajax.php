<?php defined('SYSPATH') or die('No direct access allowed.'); ?>
<?php

/**
 * Description of ajax
 *
 * @author burningface
 */
class Controller_Generatorajax extends Controller {

    private function sendHtml($html) {
        $this->response->headers(array(
            "content-type" => "text/html",
            "cache-control" => "no-cache",
            "expires: -1"
        ));
        $this->response->body($html)->send_headers()->body();
    }

    public function action_formfieldslist() {
        if ($this->request->is_ajax()) {
            $id = $this->request->param("id");
            if (!empty($id)) {
                $form = View::factory("forms/generatorformsettings");
                $form->action = "generatorajax/form";
                $form->name = $id;
                $form->labels = array("flashmessage" => "Flash message",
                    "generate_form_button" => "Generete Form");
                $form->fields = Generator_Util::listTableFields($id);
                $this->sendHtml($form->render());
            } else {
                $this->sendHtml("Requested id doesn't exsists!");
            }
        } else {
            throw new HTTP_Exception_404();
        }
    }

    public function action_form() {
        if ($this->request->is_ajax()) {
            $post = $_POST;
            if (isset($_POST["formbuilder"])) {
                $result = Generator_Form::generate($post, false);
            } else {
                $result = Generator_Form::generate($post);
            }

            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }

    public function action_controller() {
        if ($this->request->is_ajax()) {
            $result = Generator_Controller::generate($_POST);
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }
    
    public function action_curlcontroller() {
        if ($this->request->is_ajax()) {
            $result = "Upsz";
            if($_POST["template"] == "php"){
                $result = Generator_Curlcontroller::generate($_POST);
            }elseif($_POST["template"] == "twig"){
                $result = Generator_Curlcontrollertwig::generate($_POST);
            }
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }

    public function action_model() {
        if ($this->request->is_ajax()) {
            $result = Generator_Model::generate();
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }
    
    public function action_list() {
        if ($this->request->is_ajax()) {
            $result = "Upsz";
            if($_GET["template"] == "php"){
                $result = Generator_List::generate();
            }else if($_GET["template"] == "twig"){
                $result = Generator_Listtwig::generate();
            }
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }
    
    public function action_show() {
        if ($this->request->is_ajax()) {
            $result = "Upsz";
            if($_GET["template"] == "php"){
                $result = Generator_Show::generate();
            }else if($_GET["template"] == "twig"){
                $result = Generator_Showtwig::generate();
            }
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }

    public function action_assets() {
        if ($this->request->is_ajax()) {
            $result = Generator_Assets::generate();
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }
    
    public function action_template() {
        if ($this->request->is_ajax()) {
            $result = "Upsz";
            if($_GET["template"] == "php"){
                $result = Generator_Template::generate();
            }else if($_GET["template"] == "twig"){
                $result = Generator_Templatetwig::generate();
            }
            $view = View::factory("forms/generatorshowgeneratedresult");
            $view->result = $result;
            $this->sendHtml($view);
        } else {
            throw new HTTP_Exception_404();
        }
    }

    public function action_inputs() {
        $view = View::factory("forms/generatorinputs");
        $view->name = $_GET["name"];
        $view->id = $_GET["id"];
        $this->sendHtml($view);
    }

}

?>
