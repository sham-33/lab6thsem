# -------------------------------
# Box Plot
# -------------------------------

import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt

def box_plot():
    x = np.random.randn(100)
    sns.boxplot(x=x)
    plt.title("Box Plot")
    plt.show()

box_plot()



# -------------------------------
# Write a program to implement Alpha-Beta pruning algorithm.
# -------------------------------

def alphabeta(depth, index, is_max, scores, max_depth, alpha, beta):
    if depth == max_depth:
        return scores[index]

    for i in range(2):
        val = alphabeta(depth + 1, index * 2 + i, not is_max, scores, max_depth, alpha, beta)
        if is_max:
            alpha = max(alpha, val)
        else:
            beta = min(beta, val)
        if beta <= alpha:
            break
    return alpha if is_max else beta

# Example input
scores = [3, 5, 6, 9, 1, 2, 0, -1]
depth = 3

# Run Alpha-Beta pruning
result = alphabeta(0, 0, True, scores, depth, float('-inf'), float('inf'))
print("Alpha-Beta Optimal Value:", result)


