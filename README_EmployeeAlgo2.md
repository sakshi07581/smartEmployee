# Employee Algorithm 2 — K-Means Employee Work Pattern Clustering

## Purpose

K-Means Clustering groups employees based on similarities in their work-related patterns.

The algorithm does not require predefined labels.

Instead, it analyzes numerical employee features and automatically groups employees with similar characteristics.

The system uses employee attendance data to generate work-related feature vectors.

---

## Employee Features

For a selected period, each employee can be represented using:

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
    95.45,
    8.20,
    1.25
]
```

This represents:

```text
Attendance Rate       → 95.45%
Average Working Hours → 8.20 hours
Average Overtime      → 1.25 hours
```

---

## Data Sources

The features are derived from the existing employee and attendance data.

### Employee

```text
employees
```

Provides employee identity.

---

### Attendance

```text
attendances
```

Provides:

```text
select_date
duration_minutes
overtime
employee_id
```

These values are used to calculate the employee's work-related features.

---

## Attendance Rate

The basic attendance rate is calculated as:

```text
Attendance Rate =
Present Days
---------------------------
Working Days
× 100
```

For the current implementation, working days are calculated from weekdays in the selected date range.

Example:

```text
Month:
22 weekdays

Employee attendance:
20 days

Attendance Rate:
20 / 22 × 100 = 90.91%
```

---

## Average Working Hours

The system uses:

```text
attendances.duration_minutes
```

The average duration is converted from minutes to hours.

Example:

```text
Total attendance duration:
9600 minutes

Number of attendance records:
20

Average:
9600 / 20 = 480 minutes

Average working hours:
8 hours
```

---

## Average Overtime Hours

Overtime values are stored as strings.

Example:

```text
"01:30:00"
```

The value is converted into a numeric representation:

```text
1.5 hours
```

The average overtime can then be calculated for each employee.

---

## Feature Vector

Each employee becomes a numerical vector:

```text
Employee A:
[
    95.45,
    8.20,
    1.25
]

Employee B:
[
    81.82,
    7.50,
    0.50
]

Employee C:
[
    63.64,
    6.75,
    0.10
]
```

---

## How K-Means Works

The algorithm performs the following steps:

```text
1. Select the number of clusters (K)
2. Initialize cluster centroids
3. Calculate the distance between employees and centroids
4. Assign each employee to the nearest centroid
5. Recalculate the centroids
6. Repeat until the clusters stabilize
```

---

## Feature Normalization

The features have different scales.

For example:

```text
Attendance Rate       → 0 - 100
Working Hours         → 0 - 24
Overtime Hours        → 0 - potentially large values
```

Therefore, the values are normalized before clustering.

The system uses Min-Max normalization:

```text
normalized_value =
(value - minimum)
-------------------
(maximum - minimum)
```

The resulting values are generally between:

```text
0 and 1
```

---

## Example

Input dataset:

```php
[
    [95.45, 8.20, 1.25],
    [81.82, 7.50, 0.50],
    [63.64, 6.75, 0.10],
]
```

With:

```text
K = 3
```

The algorithm may produce:

```text
Employee A → Cluster 0
Employee B → Cluster 1
Employee C → Cluster 2
```

---

## Cluster Interpretation

K-Means returns cluster identifiers:

```text
Cluster 0
Cluster 1
Cluster 2
```

These numbers do not inherently mean:

```text
Cluster 0 = High
Cluster 1 = Average
Cluster 2 = Low
```

The centroids must be analyzed.

For example:

```text
Cluster A:
Attendance Rate: 95%
Working Hours: 8.5
Overtime: 2.0

Cluster B:
Attendance Rate: 82%
Working Hours: 7.5
Overtime: 0.5

Cluster C:
Attendance Rate: 64%
Working Hours: 6.7
Overtime: 0.1
```

The system may interpret them as:

```text
Cluster A → High Activity Pattern
Cluster B → Average Activity Pattern
Cluster C → Low Activity Pattern
```

These are work-pattern descriptions.

They are not official performance evaluations.

---

## Multiple Initializations

The result of K-Means can depend on the initial centroid positions.

To reduce the effect of random initialization, the system can run the algorithm multiple times.

Example:

```text
Run 1 → Inertia: 0.52
Run 2 → Inertia: 0.38
Run 3 → Inertia: 0.44
```

The result with the lowest inertia is selected.

---

## Inertia

Inertia measures the total squared distance between employees and their assigned centroids.

A lower inertia generally indicates more compact clusters.

```text
Employee Data
    ↓
K-Means
    ↓
Cluster Assignment
    ↓
Centroid Distance
    ↓
Inertia
```

---

## Employee Management Integration

```text
Employees
    ↓
Attendance Records
    ↓
Feature Generation
    ↓
Attendance Rate
Average Working Hours
Average Overtime Hours
    ↓
Feature Normalization
    ↓
K-Means
    ↓
Employee Work Pattern Clusters
```

---

## Usage

```php
use App\Algorithms\KMeans;

$dataset = [
    [95.45, 8.20, 1.25],
    [81.82, 7.50, 0.50],
    [63.64, 6.75, 0.10],
];

$kmeans = new KMeans();

$result = $kmeans->fit(
    $dataset,
    3
);

print_r($result);
```

---

## Summary

The K-Means algorithm answers:

> **Which employees have similar attendance and work-related patterns?**

It is an unsupervised learning algorithm and does not require predefined employee categories.
