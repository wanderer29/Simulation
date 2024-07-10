<?php
    class Coordinates {
        public $x;
        public $y;

        public function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }
        public function toString() {
            return $this->x . ',' . $this->y;
        }

        public function toCoordinates(string $coordinates) {
            return explode(",", $coordinates);
        }

        public function shift(CoordinatesShift $shift) {
            return new Coordinates($this->x + $shift->xShift, $this->y + $shift->yShift);
        }

        public function canShift(CoordinatesShift $shift, Map $map) : bool {
            $x = $this->x + $shift->xShift;
            $y = $this->y + $shift->yShift;
            if ($map->isPlaceEmpty(new Coordinates($x, $y)) == false) {
                $class = get_class($map->getEntity(new Coordinates($x, $y)));
            }
            else {
                $class = "";
            }

            if (($x < 0) || ($y < 1)) return false;
            if (($x > $map->sizeX - 1) || ($y > $map->sizeY - 2)) return false;
            if ($class == "Rock" || $class == "Tree") return false;

            return true;
        }
    }

?>