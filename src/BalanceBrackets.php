<?php

namespace BalanceBrackets;

class BalanceBrackets
{
    private $matches = [];
    private $left = 0;
    private $right = 0;

    public function __construct()
    {
        $this->matches["["] = "]";
        $this->matches["("] = ")";
        $this->matches["{"] = "}";
    }

    public function checkIsBalanced($bracketString)
    {
        $brackets = str_split($bracketString);

        $match = $this->checkBracket($brackets);

        if ($this->left != $this->right) {
            $match = false;
        }

        return $match;
    }

    public function checkBracket($brackets)
    {
        $bracketsBalanced = false;

        for ($i = 0; $i < count($brackets); $i++) {
            if (in_array($brackets[$i], array_keys($this->matches))) {
                $this->left++;
                $bracketsBalanced = $this->findClosingBracket($brackets, $i);
            } elseif (in_array($brackets[$i], $this->matches)) {
                continue;
            } else {
                $bracketsBalanced = false;
            }
        }

        return $bracketsBalanced;
    }

    public function findClosingBracket($brackets, $key)
    {
        for ($i = $key; $i < count($brackets); $i++) {
            if ($brackets[$i] == $this->matches[$brackets[$key]]) {
                $this->right++;
                return true;
            }
        }

        return false;
    }
}