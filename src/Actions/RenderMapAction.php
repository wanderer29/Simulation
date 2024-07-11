<?php
class RenderMapAction extends Action{
    public function doing(Map $map) {
        $mapRender = new MapRender();
        $mapRender->mapRender($map);
    }
}
?>