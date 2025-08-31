# -------------------------------
# Scatter Plot 
# -------------------------------

import numpy as np
import matplotlib.pyplot as plt

def scatter_plot():
    x = np.random.randn(100)
    y = np.random.randn(100)

    plt.scatter(x, y)
    plt.title("Scatter Plot")
    plt.xlabel("X-axis")
    plt.ylabel("Y-axis")
    plt.show()

scatter_plot()



# -------------------------------
# Hill Climbing Algorithm
# -------------------------------

import random

def objective_function(x):
    # Goal: maximize -x^2 + 5 (i.e., peak at x = 0)
    return -x**2 + 5

def hill_climbing(start_x, step_size, max_iterations):
    current_x = start_x
    current_score = objective_function(current_x)

    print("\nHill Climbing Optimization:")
    for i in range(max_iterations):
        new_x = current_x + random.uniform(-step_size, step_size)
        new_score = objective_function(new_x)

        print(f"Iteration {i+1}: x = {current_x:.4f}, f(x) = {current_score:.4f}")

        if new_score > current_score:
            current_x = new_x
            current_score = new_score

    print("\nFinal Solution:")
    print(f"x = {current_x:.4f}, f(x) = {current_score:.4f}")

hill_climbing(start_x=0.1, step_size=0.05, max_iterations=5)
