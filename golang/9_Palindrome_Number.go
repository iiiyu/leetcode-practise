package main
import "strconv"

func isPalindrome(x int) bool {
	if (x < 0) {
		return false
	}
	s := strconv.Itoa(x)
	rs := reverse(s)
	return s == rs
}

func reverse(s string) string {
	runes := []rune(s)
	for i, j := 0, len(runes)-1; i < j; i, j = i+1, j-1 {
		runes[i], runes[j] = runes[j], runes[i]
	}
	return string(runes)
}