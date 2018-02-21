<?php

namespace QDL;


class Comment
{
    protected $comments = [];

    const COMMENT = 1;
    const TITLE = 2;
    const TOSTRING = 3;
    const DEFAULT_FILTER_VISIBILITY = 4;
    const DEFAULT_GRID_VISIBILITY = 5;
    const DEFAULT_DETAIL_VISIBILITY = 6;
    const DEFAULT_FORM_VISIBILITY = 7;

    public function __construct($comment = "")
    {
        $this->comments = [
            Comment::COMMENT => $comment,
            Comment::TITLE => "",
            Comment::TOSTRING => "",
            Comment::DEFAULT_FILTER_VISIBILITY => 1,
            Comment::DEFAULT_GRID_VISIBILITY => 1,
            Comment::DEFAULT_DETAIL_VISIBILITY => 1,
            Comment::DEFAULT_FORM_VISIBILITY => 1,
        ];

        return $this;
    }

    public function title($value) {
        $this->comments[Comment::TITLE] = $value;
        return $this;
    }

    public function tostring() {
        $this->comments[Comment::TOSTRING] = 1;
        return $this;
    }

    public function filter_hide() {
        $this->comments[Comment::DEFAULT_FILTER_VISIBILITY] = 0;
        return $this;
    }

    public function grid_hide() {
        $this->comments[Comment::DEFAULT_GRID_VISIBILITY] = 0;
        return $this;
    }
    public function detail_hide() {
        $this->comments[Comment::DEFAULT_DETAIL_VISIBILITY] = 0;
        return $this;
    }
    public function form_hide() {
        $this->comments[Comment::DEFAULT_FORM_VISIBILITY] = 0;
        return $this;
    }

    public function __toString()
    {
        return implode("|",array_map(function($key,$value){
            if($key == Comment::COMMENT) {
                return $value;
            } else {
                return "$key:$value";
            }
        },array_keys($this->comments),array_values($this->comments)));
    }

    public static function decrypt($comment,$index) {
        $arrCommentRaw = explode("|",$comment);

        $arrComment = [];
        foreach($arrCommentRaw as $idx => $item) {
            if($idx == 0) {
                $arrComment[\QDL\Comment::COMMENT] = $item;
            } else {
                $option = explode(":",$item);
                $arrComment[$option[0]] = $option[1];
            }
        }

        return $arrComment[$index];
    }
}