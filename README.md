# Balance Brackets Kata
BalanceBrackets::checkIsBalanced() takes a string, and must return true or false depending on whether the brackets balance.

Test string contains three types of brackets - () {} []

Code must describe whether these brackets match.  Each left bracket must have a closing right bracket, and brackets most not cross over.

## Examples
### Passes
```
{}{}
```

```
[{()}]
```

### Fails
```
{}{
```

```
[{(})]
```