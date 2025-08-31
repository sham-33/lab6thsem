import numpy as np
import matplotlib.pyplot as plt

# -------------------------------
# 3D Surface Plot 
# -------------------------------
def plot_3d:
    x = np.linspace(-5, 5, 50)
    y = np.linspace(-5, 5, 50)
    X, Y = np.meshgrid(x, y)
    Z = np.sin(np.sqrt(X**2 + Y**2))

    ax = plt.figure().add_subplot(111, projection='3d')
    ax.plot_surface(X, Y, Z, cmap='viridis')
    ax.set_title("3D Surface Plot")
    plt.show()

plot_3d()



# ---------------------------------
# Best First Search (Greedy BFS)
# ---------------------------------

from queue import PriorityQueue

def best_first_search(graph, heuristics, start, goal):
    visited = set()
    pq = PriorityQueue()
    pq.put((heuristics[start], start))
    came_from = {}

    while not pq.empty():
        _, current = pq.get()

        if current == goal:
            # Reconstruct path
            path = [goal]
            while current in came_from:
                current = came_from[current]
                path.append(current)
            path.reverse()
            print("Best First Search Path:", ' -> '.join(path))
            return

        if current not in visited:
            visited.add(current)
            for neighbor in graph.get(current, []):
                if neighbor not in visited:
                    pq.put((heuristics[neighbor], neighbor))
                    came_from[neighbor] = current

# Sample graph and heuristic
graph = {
    'A': ['B', 'C'],
    'B': ['D'],
    'C': ['D'],
    'D': []
}
heuristics = {
    'A': 3,
    'B': 2,
    'C': 1,
    'D': 0
}

best_first_search(graph, heuristics, 'A', 'D')
