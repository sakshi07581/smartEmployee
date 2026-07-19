# Employee Algorithm 3 — K-Nearest Neighbors Salary Class Classification

## Purpose

K-Nearest Neighbors (KNN) classifies a new employee by comparing their work-related features with existing employees.

The classification is based on the salary class already associated with historical employee records.

This algorithm does not predict employee performance.

It predicts the salary class that is most similar to the new employee based on the available employee feature data.

---

## Existing Salary Class Data

The system already contains salary classification data in:

```text
salary_structures.salary_class
```

Each employee is connected to a salary structure through:

```text
employees.salary_structure_id
```

Therefore:

```text
Employee
    ↓
Salary Structure
    ↓
Salary Class
```

Example:

```text
Employee A → Salary Class A
Employee B → Salary Class B
Employee C → Salary Class A
```

The salary class becomes the classification label used by KNN.

---

## Employee Features

The employee's work-related features are:

```text
[
    attendance_rate,
    average_working_hours,
    average_overtime_hours
]
```

Example:

```text
[
    91.00,
    8.00,
    1.20
]
```

These features are derived from the employee's attendance records.

---

## Training Dataset

KNN uses historical employee records with known salary classes.

Example:

```php
[
    [
        'features' => [95.45, 8.50, 2.00],
        'label' => 'Class A',
    ],

    [
        'features' => [81.82, 7.50, 0.50],
        'label' => 'Class B',
    ],

    [
        'features' => [92.00, 8.00, 1.50],
        'label' => 'Class A',
    ],
]
```

The features come from employee attendance metrics.

The labels come from:

```text
salary_structures.salary_class
```

---

## How KNN Works

The algorithm follows these steps:

```text
1. Build a dataset from existing employees
2. Generate numerical features
3. Retrieve the salary class of each employee
4. Normalize the feature values
5. Receive a new employee feature vector
6. Calculate the distance to existing employees
7. Select the K nearest employees
8. Count their salary-class labels
9. Return the majority class
```

---

## Euclidean Distance

The similarity between employees is measured using Euclidean distance.

For two feature vectors:

```text
A = [a1, a2, a3]

B = [b1, b2, b3]
```

The distance is:

```text
distance =
√(
    (a1 - b1)² +
    (a2 - b2)² +
    (a3 - b3)²
)
```

A smaller distance means that the employees have more similar feature values.

---

## Feature Normalization

The features have different numerical scales.

For example:

```text
Attendance Rate       → 0 - 100
Average Working Hours → 0 - 24
Average Overtime      → Variable
```

Before calculating distances, the system applies Min-Max normalization:

```text
normalized_value =
(value - minimum)
-------------------
(maximum - minimum)
```

The same normalization ranges calculated from the training dataset must also be applied to the new employee's features.

---

## Example

Historical employee dataset:

```text
Employee A:
[
    95.0,
    8.5,
    2.0
]
→ Class A

Employee B:
[
    82.0,
    7.5,
    0.5
]
→ Class B

Employee C:
[
    92.0,
    8.0,
    1.5
]
→ Class A
```

New employee:

```text
[
    91.0,
    8.2,
    1.4
]
```

The algorithm calculates the distance from the new employee to every historical employee.

Suppose the three nearest employees are:

```text
Class A
Class A
Class B
```

The majority vote is:

```text
Class A
```

Therefore:

```text
Predicted Salary Class:
Class A
```

---

## Choosing K

The `K` value determines how many nearest employees participate in the prediction.

Example:

```text
K = 3
```

The algorithm selects the three nearest employees.

A common practice is to use an odd value of `K` to reduce the possibility of a tie.

Examples:

```text
K = 3
K = 5
K = 7
```

The best value depends on the size and distribution of the available employee dataset.

---

## Database Integration

```text
Employees
    ↓
Attendance Records
    ↓
Employee Features
    ├── Attendance Rate
    ├── Average Working Hours
    └── Average Overtime Hours
            +
            ↓
Salary Structure
    ↓
Salary Class
            ↓
KNN Training Dataset
```

The final dataset becomes:

```text
[
    [
        'features' => [
            attendance_rate,
            avg_working_hours,
            avg_overtime_hours,
        ],
        'label' => salary_class,
    ],
]
```

---

## Prediction Flow

```text
New Employee
    ↓
Attendance Data
    ↓
Feature Generation
    ↓
Feature Normalization
    ↓
Distance Calculation
    ↓
Nearest Existing Employees
    ↓
Majority Voting
    ↓
Predicted Salary Class
```

---

## Usage

```php
use App\Algorithms\KNN;

$knn = new KNN();

$dataset = [
    [
        'features' => [95.0, 8.5, 2.0],
        'label' => 'Class A',
    ],

    [
        'features' => [82.0, 7.5, 0.5],
        'label' => 'Class B',
    ],

    [
        'features' => [92.0, 8.0, 1.5],
        'label' => 'Class A',
    ],
];

$knn->fit($dataset);

$prediction = $knn->predict(
    [91.0, 8.2, 1.4],
    3
);

echo $prediction;
```

---

## Important Limitation

KNN does not independently determine whether a salary class is correct.

It learns relationships from the existing employee dataset.

Therefore, the quality of the prediction depends on:

```text
Number of employees
        +
Quality of attendance data
        +
Consistency of salary classes
```

If the training dataset is small or contains poor-quality data, the prediction may not be reliable.

The algorithm should therefore be considered a similarity-based classification tool.

---

## Summary

The KNN algorithm answers:

> **Based on employees with similar attendance and work-related patterns, which existing salary class is this employee most similar to?**

It is a supervised classification algorithm because it requires existing employee records with known salary-class labels.
