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
    const GRID_WIDTH = 8;
    const MODEL_HIDDEN = 9;
    const FORM_REPEAT = 10;
    const FORM_MAX_LENGTH = 11;
    const FORM_MIN_LENGTH = 12;
    const FORM_MAX_VALUE = 13;
    const FORM_MIN_VALUE = 14;
    const FORM_ALPHA = 15;
    const FORM_ALPHA_NUM = 16;
    const FORM_NUMERIC = 17;
    const FORM_EMAIL = 18;
    const FORM_AUTOCOMPLETE = 19;
    const FORM_RADIO = 20;
    const FORM_CHAIN_TO = 21;
    const FORM_CHAIN_FROM = 22;

    public function __construct($comment = "", $decrypt = false)
    {
        if($decrypt) {
            $this->comments = Comment::decrypt($comment);
        } else {
            $this->comments = [
                Comment::COMMENT => $comment,
                Comment::TITLE => "",
                Comment::TOSTRING => "",
                Comment::DEFAULT_FILTER_VISIBILITY => 1,
                Comment::DEFAULT_GRID_VISIBILITY => 1,
                Comment::DEFAULT_DETAIL_VISIBILITY => 1,
                Comment::DEFAULT_FORM_VISIBILITY => 1,
                Comment::GRID_WIDTH => 120,
                Comment::MODEL_HIDDEN => 0,
                Comment::FORM_REPEAT => 0,
                Comment::FORM_MAX_LENGTH => -1,
                Comment::FORM_MIN_LENGTH => -1,
                Comment::FORM_MAX_VALUE => -1,
                Comment::FORM_MIN_VALUE => -1,
                Comment::FORM_ALPHA => -1,
                Comment::FORM_ALPHA_NUM => -1,
                Comment::FORM_NUMERIC => -1,
                Comment::FORM_EMAIL => -1,
                Comment::FORM_AUTOCOMPLETE => -1,
                Comment::FORM_RADIO => -1,
                Comment::FORM_CHAIN_TO => "",
                Comment::FORM_CHAIN_FROM => "",
            ];
        }

        return $this;
    }

    public function title($value) {
        $this->comments[Comment::TITLE] = $value;
        return $this;
    }

    public function getTitle() {
        return $this->getByIndex(Comment::TITLE);
    }

    public function tostring() {
        $this->comments[Comment::TOSTRING] = 1;
        return $this;
    }

    public function getToString() {
        return $this->getByIndex(Comment::TOSTRING);
    }

    public function filter_hide() {
        $this->comments[Comment::DEFAULT_FILTER_VISIBILITY] = 0;
        return $this;
    }

    public function getFilterHide() {
        return $this->getByIndex(Comment::DEFAULT_FILTER_VISIBILITY);
    }

    public function grid_hide() {
        $this->comments[Comment::DEFAULT_GRID_VISIBILITY] = 0;
        return $this;
    }

    public function getGridHide() {
        return $this->getByIndex(Comment::DEFAULT_GRID_VISIBILITY);
    }

    public function detail_hide() {
        $this->comments[Comment::DEFAULT_DETAIL_VISIBILITY] = 0;
        return $this;
    }

    public function getDetailHide() {
        return $this->getByIndex(Comment::DEFAULT_DETAIL_VISIBILITY);
    }

    public function form_hide() {
        $this->comments[Comment::DEFAULT_FORM_VISIBILITY] = 0;
        return $this;
    }

    public function getFormHide() {
        return $this->getByIndex(Comment::DEFAULT_FORM_VISIBILITY);
    }

    public function grid_column_width($val) {
        $this->comments[Comment::GRID_WIDTH] = $val;
        return $this;
    }

    public function getGridColumnWidth() {
        return $this->getByIndex(Comment::GRID_WIDTH);
    }

    public function model_hidden() {
        $this->comments[Comment::MODEL_HIDDEN] = 1;
        return $this;
    }

    public function getModelHidden() {
        return $this->getByIndex(Comment::MODEL_HIDDEN);
    }

    public function form_repeat() {
        $this->comments[Comment::FORM_REPEAT] = 1;
        return $this;
    }

    public function getFormRepeat() {
        return $this->getByIndex(Comment::FORM_REPEAT);
    }

    public function form_max_length($val) {
        $this->comments[Comment::FORM_MAX_LENGTH] = $val;
        return $this;
    }

    public function getFormMaxLength() {
        return $this->getByIndex(Comment::FORM_MAX_LENGTH);
    }

    public function form_min_length($val) {
        $this->comments[Comment::FORM_MIN_LENGTH] = $val;
        return $this;
    }

    public function getFormMinLength() {
        return $this->getByIndex(Comment::FORM_MIN_LENGTH);
    }

    public function form_max_value($val) {
        $this->comments[Comment::FORM_MAX_VALUE] = $val;
        return $this;
    }

    public function getFormMaxValue() {
        return $this->getByIndex(Comment::FORM_MAX_VALUE);
    }

    public function form_min_value($val) {
        $this->comments[Comment::FORM_MIN_VALUE] = $val;
        return $this;
    }

    public function getFormMinValue() {
        return $this->getByIndex(Comment::FORM_MIN_VALUE);
    }

    public function form_alpha() {
        $this->comments[Comment::FORM_ALPHA] = 1;
        return $this;
    }

    public function getFormAlpha() {
        return $this->getByIndex(Comment::FORM_ALPHA);
    }

    public function form_alpha_num() {
        $this->comments[Comment::FORM_ALPHA_NUM] = 1;
        return $this;
    }

    public function getFormAlphaNum() {
        return $this->getByIndex(Comment::FORM_ALPHA_NUM);
    }

    public function form_numeric() {
        $this->comments[Comment::FORM_NUMERIC] = 1;
        return $this;
    }

    public function getFormNumeric() {
        return $this->getByIndex(Comment::FORM_NUMERIC);
    }

    public function form_email() {
        $this->comments[Comment::FORM_EMAIL] = 1;
        return $this;
    }

    public function getFormEmail() {
        return $this->getByIndex(Comment::FORM_EMAIL);
    }

    public function form_autocomplete() {
        $this->comments[Comment::FORM_AUTOCOMPLETE] = 1;
        return $this;
    }

    public function getFormAutocomplete() {
        return $this->getByIndex(Comment::FORM_AUTOCOMPLETE);
    }

    public function form_radio() {
        $this->comments[Comment::FORM_RADIO] = 1;
        return $this;
    }

    public function getFormRadio() {
        return $this->getByIndex(Comment::FORM_RADIO);
    }

    public function form_chain_to($fields) {
        $this->comments[Comment::FORM_CHAIN_TO] = implode(",",$fields);
        return $this;
    }

    public function getFormChainTo() {
        return explode(",",$this->getByIndex(Comment::FORM_CHAIN_TO));
    }

    public function form_chain_from($fields) {
        $this->comments[Comment::FORM_CHAIN_FROM] = implode(",",$fields);
        return $this;
    }

    public function getFormChainFrom() {
        return explode(",",$this->getByIndex(Comment::FORM_CHAIN_FROM));
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
    
    public function getByIndex($index) {
        $value = $this->getByIndex($index);
        if($value == -1) {
            return null;
        } else {
            return $value;
        }
    }

    public static function decrypt($comment,$index=null) {
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

        if(is_null($index)) {
            return $arrComment;
        } else {
            return $arrComment[$index];
        }
    }
}