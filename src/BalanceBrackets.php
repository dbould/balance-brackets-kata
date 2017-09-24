<?php

namespace BalanceBrackets;

class BalanceBrackets
{
    private $matches = [];
    private $unclosed = [];
    private $left;
    private $right;

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

        return $match;
    }

    public function checkBracket($brackets)
    {
        $bracketsBalanced = false;

        for ($i = 0; $i < count($brackets); $i++) {
            if (in_array($brackets[$i], array_keys($this->matches))) {
                $this->left++;
                $bracketsBalanced = $this->findClosingBracket($brackets, $i);

                if ($bracketsBalanced === false) {
                    break;
                }
            } elseif (in_array($brackets[$i], $this->matches)) {
                $this->right++;
                continue;
            } else {
                $bracketsBalanced = false;
            }
        }

        if ($this->left != $this->right) {
            $bracketsBalanced = false;
        }

        return $bracketsBalanced;
    }

    public function findClosingBracket($brackets, $key)
    {
        $match = false;

        for ($i = $key; $i < count($brackets); $i++) {

            if (in_array($brackets[$i], array_keys($this->matches))) {
                $this->unclosed[] = $brackets[$i];
            }

            if (in_array($brackets[$i], $this->matches)) {
                if ($this->matches[array_pop($this->unclosed)] != $brackets[$i]) {
                    $match = false;
                    break;
                }
                else if ($this->matches[$brackets[$key]] == $brackets[$i]) {
                    $match = true;
                    break;
                }
            } elseif (isset($brackets[$i]) && $brackets[$i] == $this->matches[$brackets[$key]]) {
                $match = true;
                break;

            } else if (isset($brackets[$i]) && $brackets[$i] != $this->matches[$brackets[$key]] &&
                       in_array($brackets[$i], $this->matches)) {
                $match = false;
                break;
            }
        }

        return $match;
    }
}