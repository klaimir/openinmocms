<?php
/*
* Pagination Class File
* Resource from http://net.tutsplus.com/tutorials/php/how-to-paginate-data-with-php/
* La clase ha sido modificada para que pueda soportar multi-listados
*/

class Paginator
{  
	// Variables para multi-listado   
    var $list_name;
	var $ipp_name;
	// Resto de variables originales
	var $items_per_page;  
    var $items_total;  
    var $current_page;  
    var $num_pages;  
    var $mid_range;  
    var $low;  
    var $high;  
    var $limit;  
    var $return;  
    var $default_ipp = 25;
	// Almacena la url sobre la que se ejecuta la paginación
	var $url_actual; 
	var $separador; 
  
    function Paginator($name='')  
    {  
        $this->list_name = "page".$name;
		$this->ipp_name = "ipp".$name;
		$this->current_page = 1;  
        $this->mid_range = 7;
		$this->url_actual = $_SERVER['PHP_SELF']; 
		$this->separador = "?";  
        $this->items_per_page = (!empty($_GET[$this->ipp_name])) ? $_GET[$this->ipp_name]:$this->default_ipp;  
    }  
  
    function paginate()  
    {  
        if($_GET[$this->ipp_name] == 'Todos')  
        {  
            $this->num_pages = ceil($this->items_total/$this->default_ipp);  
            $this->items_per_page = $this->default_ipp;  
        }  
        else  
        {  
            if(!is_numeric($this->items_per_page) OR $this->items_per_page <= 0) $this->items_per_page = $this->default_ipp;  
            $this->num_pages = ceil($this->items_total/$this->items_per_page);
        }  
        $this->current_page = (int) $_GET[$this->list_name]; // must be numeric > 0  
        if($this->current_page < 1 Or !is_numeric($this->current_page)) $this->current_page = 1;  
        if($this->current_page > $this->num_pages) $this->current_page = $this->num_pages;  
        $prev_page = $this->current_page-1;  
        $next_page = $this->current_page+1;  
  
        if($this->num_pages > 10)  
        {  
            $this->return = ($this->current_page != 1 And $this->items_total >= 10) ? "<a class=\"paginate\" href=\"$this->url_actual$this->separador$this->list_name=$prev_page&$this->ipp_name=$this->items_per_page\">« Previous</a> ":"<span class=\"inactive\" href=\"#\">« Previous</span> ";  
  
            $this->start_range = $this->current_page - floor($this->mid_range/2);  
            $this->end_range = $this->current_page + floor($this->mid_range/2);  
  
            if($this->start_range <= 0)  
            {  
                $this->end_range += abs($this->start_range)+1;  
                $this->start_range = 1;  
            }  
            if($this->end_range > $this->num_pages)  
            {  
                $this->start_range -= $this->end_range-$this->num_pages;  
                $this->end_range = $this->num_pages;  
            }  
            $this->range = range($this->start_range,$this->end_range);  
  
            for($i=1;$i<=$this->num_pages;$i++)  
            {  
                if($this->range[0] > 2 And $i == $this->range[0]) $this->return .= " ... ";  
                // loop through all pages. if first, last, or in range, display  
                if($i==1 Or $i==$this->num_pages Or in_array($i,$this->range))  
                {  
                    $this->return .= ($i == $this->current_page And $_GET[$this->list_name] != 'Todos') ? "<a title=\"Go to page $i of $this->num_pages\" class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" title=\"Go to page $i of $this->num_pages\" href=\"$this->url_actual$this->separador$this->list_name=$i&$this->ipp_name=$this->items_per_page\">$i</a> ";  
                }  
                if($this->range[$this->mid_range-1] < $this->num_pages-1 And $i == $this->range[$this->mid_range-1]) $this->return .= " ... ";  
            }  
            $this->return .= (($this->current_page != $this->num_pages And $this->items_total >= 10) And ($_GET[$this->list_name] != 'Todos')) ? "<a class=\"paginate\" href=\"$this->url_actual$this->separador$this->list_name=$next_page&$this->ipp_name=$this->items_per_page\">Next »</a>\n":"<span class=\"inactive\" href=\"#\">» Next</span>\n";  
            $this->return .= ($_GET[$this->list_name] == 'Todos') ? "<a class=\"current\" style=\"margin-left:10px\" href=\"#\">Ver todos</a> \n":"<a class=\"paginate\" style=\"margin-left:10px\" href=\"$this->url_actual$this->separador$this->list_name=1&$this->ipp_name=Todos\">Ver todos</a> \n";  
        }  
        else  
        {  
            for($i=1;$i<=$this->num_pages;$i++)  
            {  
                $this->return .= ($i == $this->current_page) ? "<a class=\"current\" href=\"#\">$i</a> ":"<a class=\"paginate\" href=\"$this->url_actual$this->separador$this->list_name=$i&$this->ipp_name=$this->items_per_page\">$i</a> ";  
            }  
            $this->return .= "<a class=\"paginate\" href=\"$this->url_actual$this->separador$this->list_name=1&$this->ipp_name=Todos\">Ver todos</a> \n";  
        }  
        $this->low = ($this->current_page-1) * $this->items_per_page;  
        $this->high = ($_GET[$this->ipp_name] == 'Todos') ? $this->items_total:($this->current_page * $this->items_per_page)-1;  
        $this->limit = ($_GET[$this->ipp_name] == 'Todos') ? "":" LIMIT $this->low,$this->items_per_page";  
    }  
  
    function display_items_per_page()  
    {  
        $items = '';  
        $ipp_array = array(10,25,50,100,'Todos');  
        foreach($ipp_array as $ipp_opt)    $items .= ($ipp_opt == $this->items_per_page) ? "<option selected value=\"$ipp_opt\">$ipp_opt</option>\n":"<option value=\"$ipp_opt\">$ipp_opt</option>\n";  
        return "<span class=\"paginate\">Registros por página:</span><select class=\"paginate\" onchange=\"window.location='$this->url_actual$this->separador$this->list_name=1&$this->ipp_name='+this[this.selectedIndex].value;return false\">$items</select>\n";  
    }  
  
    function display_jump_menu()  
    {  
        for($i=1;$i<=$this->num_pages;$i++)  
        {  
            $option .= ($i==$this->current_page) ? "<option value=\"$i\" selected>$i</option>\n":"<option value=\"$i\">$i</option>\n";  
        }  
        return "<span class=\"paginate\">Página:</span><select class=\"paginate\" onchange=\"window.location='$this->url_actual$this->separador$this->list_name='+this[this.selectedIndex].value+'&$this->ipp_name=$this->items_per_page';return false\">$option</select>\n";  
    }  
  
    function display_pages()  
    {  
        return $this->return;  
    }  
}
?>