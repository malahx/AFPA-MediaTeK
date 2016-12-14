<?php

class Book {

    private $id, $author, $title, $cover, $year, $date, $document_id;

    function __construct($data, $author = null, $title = null, $cover = null, $year = null, $date = null, $document_id = null) {
        if (is_int($data) && $name != null) {
            $this->id = $data;
            $this->author = $author;
            $this->title = $title;
            $this->cover = $cover;
            $this->year = $year;
            $this->date = $date;
            $this->document_id = $document_id;
        } else if (is_array($data)) {
            $this->id = (int) $data['id'];
            $this->author = $data['author'];
            $this->title = $data['title'];
            $this->cover = $data['cover'];
            $this->year = $data['year'];
            $this->date = $data['date'];
            $this->document_id = (int) $data['document_id'];
        }
    }

    function toArray() {
        return array(
            'id' => $this->id,
            'author' => $this->author,
            'title' => $this->title,
            'cover' => $this->cover,
            'year' => $this->year,
            'date' => $this->date,
            'document_id' => $this->document_id,
        );
    }

}
