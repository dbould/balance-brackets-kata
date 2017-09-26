<?php

namespace BalanceBrackets;

class BalanceBrackets
{
    private $matches = [];
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

        $bracketsBalanced = false;

        $unclosed = [];

        for ($i = 0; $i < count($brackets); $i++) {
            if (in_array($brackets[$i], array_keys($this->matches))) {
                $this->left++;
                $unclosed[] = $brackets[$i];
            } elseif (in_array($brackets[$i], $this->matches)) {
                $this->right++;

                $lastUnclosed = array_pop($unclosed);

                if (isset($lastUnclosed)) {
                    $closingBracket = $this->matches[$lastUnclosed];
                    if ($closingBracket != $brackets[$i]) {
                        return false;
                    } else {
                        $bracketsBalanced = true;
                    }
                }
            }
        }

        if ($this->left != $this->right) {
            $bracketsBalanced = false;
        }

        return $bracketsBalanced;
    }

}
