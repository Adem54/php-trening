<?php


class ProductData {
    public ?int $id; // Nullable integer for ID, it may not be set for new records
    public string $name;
    public int $size;
    public bool $is_available;

    public function __construct(?int $id, string $name, int $size, bool $is_available) {
        $this->id = $id;
        $this->name = $name;
        $this->size = $size;
        $this->is_available = $is_available;
    }
}
?>