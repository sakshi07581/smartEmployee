# Employee Algorithm 1 — Z-Score Employee Data Outlier Detection

## Purpose

The Z-Score algorithm identifies unusually high or low numerical values in employee-related data.

In this Employee Management System, the algorithm can be used to detect unusual values in:

* Attendance duration
* Overtime hours
* Payroll amounts
* Salary amounts

The algorithm is used for statistical anomaly detection.

It does not determine whether an employee is good or bad. It only identifies values that are statistically unusual compared with the rest of the selected dataset.

---

## How It Works

The algorithm measures how far a value is from the average in terms of standard deviations.

The formula is:

```text
Z = (x - μ) / σ
```

Where:

* `x` = Individual value
* `μ` = Mean of the dataset
* `σ` = Standard deviation

A value is considered an outlier when:

```text
|Z| >= threshold
```

The default threshold is:

```text
3.0
```

---

## Data Sources

The algorithm uses numerical data already available in the database.

### Attendance Duration

From:

```text
attendances.duration_minutes
```

Example:

```text
[
    450,
    480,
    495,
    510,
    900
]
```

The values represent attendance duration in minutes.

---

### Overtime

From:

```text
attendances.overtime
```

The overtime value is stored as a string and must first be converted into a numeric representation, such as hours.

Example:

```text
"02:30:00" → 2.5 hours
```

After conversion:

```text
[
    0.5,
    1.0,
    1.25,
    2.0,
    8.0
]
```

The Z-Score algorithm can then be applied.

---

### Payroll Amount

From:

```text
payrolls.total_payable
```

Example:

```text
[
    25000,
    26000,
    25500,
    27000,
    90000
]
```

The algorithm can identify unusually high or low payroll values.

---

### Salary Amount

Salary values may also be analyzed from the salary structure data, such as:

```text
salary_structures.basic_salary
salary_structures.total_salary
```

---

## Example

Suppose the following attendance durations are analyzed:

```text
[
    480,
    495,
    500,
    510,
    900
]
```

The algorithm calculates:

```text
Mean
Standard Deviation
Z-Score for Each Value
```

If the value `900` produces a Z-Score greater than the configured threshold, it is flagged as an outlier.

---

## Usage

```php
use App\Algorithms\ZScore;

$values = [
    480,
    495,
    500,
    510,
    900,
];

$outliers = ZScore::detectOutliers(
    $values,
    3.0
);

print_r($outliers);
```

---

## Expected Output

The algorithm returns information about detected outliers.

Example:

```php
[
    [
        'value' => 900,
        'z' => 3.45,
    ],
]
```

The service layer can then map the result back to the original database record.

For example:

```text
Outlier
    ↓
Original Attendance Record
    ↓
Employee
    ↓
Attendance Date
    ↓
Administrative Review
```

---

## Employee Management Integration

```text
Database
    ↓
Attendance / Payroll / Salary Data
    ↓
Numeric Values
    ↓
Z-Score Calculation
    ↓
Outlier Detection
    ↓
Administrative Analysis
```

---

## Important Limitations

Z-Score is a statistical detection method.

An outlier does not necessarily mean that the record is incorrect.

For example:

```text
Unusually high overtime
```

could be:

```text
A genuine situation
```

or:

```text
A data entry error
```

Therefore, the algorithm should flag records for review rather than automatically changing or deleting them.

Z-Score is most useful when the dataset contains a reasonable number of observations and is not extremely skewed.

---

## Summary

The Z-Score algorithm answers:

> **Which employee-related numerical records are statistically unusual compared with the rest of the dataset?**

It is used for anomaly detection.
