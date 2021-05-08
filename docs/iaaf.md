# How are the IAAF points calculated?

While the formulas for combined events are easily obtainable in the literature,
the general IAAF points for athletics that are used to compare performances
across events are only published as lookup tables. Here is the math behind
those tables.

## Track events

It's simpler to grasp this starting with the simpler cases.

In track events the result is measured against a reference time. Your improvement
with respect to the reference is then squared and multiplied by a certain factor
that converts squared seconds to points.

Let's consider 100m outdoor men as an example. The reference time for this event
is 17 seconds in the 2017 edition.

Suppose John ran the distance in 11.78 seconds. That is 5.22 seconds better than
the reference time. John's result is equivalent to 24.63 * 5.22^2 = 952 points
(we round the decimals down to the nearest integer). The 24.63 is a coefficient
specific to this event.

The formula for track events can be expressed like this:
`points = floor(conversionFactor * (reference - result)^2)`.

## General formula

The other events have one more event-dependant coefficient.

First, the result is shifted by a number (similar to comparing with reference
in track events).

The shifted result is then squared and multiplied by a factor. And this is then
shifted by another number.

The formula can be expressed like this:
`points = floor(conversionFactor * (result + resultShift)^2 + pointShift)`.

This formula can (and is) also be used for track events by setting
`resultShift = -reference` and `pointShift = 0`.
