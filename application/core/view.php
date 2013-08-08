<?
class View{
    function generate($content_view, $template_view, $data = null, $id = null, $extars = null){
        include 'application/views/' . $template_view;
    }
}