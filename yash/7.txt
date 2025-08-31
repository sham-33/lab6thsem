# 7) Write a program to develop the KNN classifier with Euclidean distance and 
# Manhattan distance for the k value as 3, based on a 70-30 train-test split on the Glass dataset.

import pandas as pd
from sklearn.datasets import fetch_openml
from sklearn.model_selection import train_test_split
from sklearn.neighbors import KNeighborsClassifier
from sklearn.metrics import confusion_matrix, accuracy_score

def knn_classifier():
    # Load real Glass dataset from OpenML
    glass = fetch_openml(name='glass', version=1, as_frame=True)
    df = glass.frame

    # Separate features and target
    X = df.drop(columns=['Type'])  # Features
    y = df['Type']                 # Target

    # Train-test split (70% train, 30% test)
    X_train, X_test, y_train, y_test = train_test_split(
        X, y, test_size=0.3, random_state=42
    )

    # KNN with Euclidean distance
    knn_euclidean = KNeighborsClassifier(n_neighbors=3, metric='euclidean')
    knn_euclidean.fit(X_train, y_train)
    pred_euclidean = knn_euclidean.predict(X_test)

    print("=== Euclidean Distance ===")
    print("Confusion Matrix:\n", confusion_matrix(y_test, pred_euclidean))
    print("Accuracy:", accuracy_score(y_test, pred_euclidean))

    # KNN with Manhattan distance
    knn_manhattan = KNeighborsClassifier(n_neighbors=3, metric='manhattan')
    knn_manhattan.fit(X_train, y_train)
    pred_manhattan = knn_manhattan.predict(X_test)

    print("\n=== Manhattan Distance ===")
    print("Confusion Matrix:\n", confusion_matrix(y_test, pred_manhattan))
    print("Accuracy:", accuracy_score(y_test, pred_manhattan))

knn_classifier()
