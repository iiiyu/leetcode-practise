package main

//import "fmt"

func maxArea(height []int) int {
	maxArea := 0
	for i := 0; i < len(height) - 1; i = i+1 {
		for j := i + 1; j < len(height); j = j+1 {
			minHeight := min(height[i], height[j])
			area := minHeight * (j - i)
			maxArea = max(maxArea, area)
		}
	}
    return maxArea
}

func min(a, b int) int {
	if a < b {
		return a
	}
	return b
}

func max(a,b int) int {
	if a < b {
		return b
	}
	return a
}