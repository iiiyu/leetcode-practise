package main

import "fmt"

func longestCommonPrefix(strs []string) string {
	if len(strs) < 1 {
		return ""
	}
	strsArray := [][]rune{}
	for _, value := range strs {
		strsArray = append(strsArray, []rune(value))
	}
	
	prefix := ""
	flag := true
	for i := 0; i < len(strsArray[0]); i = i + 1 {
		for j := 0; j < len(strsArray); j = j + 1 {
			
			if len(strsArray[j]) - 1 < i {
				flag = false
				break
			}
			
			if strsArray[0][i] != strsArray[j][i] {
				flag = false
				break
			}
		}
		
		if flag {
			prefix = prefix + string(strsArray[0][i])
		} else {
			break
		}
	}
	
	return prefix
}
