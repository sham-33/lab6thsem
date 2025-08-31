# -------------------------------
# Heap Map 
# -------------------------------

import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt

def heat_map():
    data = np.random.rand(10, 10)
    sns.heatmap(data, cmap='viridis')
    plt.title("Heatmap")
    plt.show()

heat_map()


# -------------------------------
# Write a program to implement Min-Max algorithm.
# -------------------------------

def minimax(depth, index, is_max, scores, max_depth):
    if depth == max_depth:
        return scores[index]
    left = minimax(depth + 1, index * 2, False, scores, max_depth)
    right = minimax(depth + 1, index * 2 + 1, False, scores, max_depth)
    return max(left, right) if is_max else min(left, right)

# Example input: depth 3 (8 leaves)
scores = [3, 5, 6, 9, 1, 2, 0, -1]
depth = 3

print("Minimax Optimal Value:", minimax(0, 0, True, scores, depth))

