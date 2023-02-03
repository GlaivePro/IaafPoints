# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0](https://github.com/GlaivePro/IaafPoints/releases/tag/1.1.0)
### Added
- 2022 editions of WA points.

### Changed
- CI testing from Travis to GH actions.

## [1.0.0](https://github.com/GlaivePro/IaafPoints/releases/tag/1.0.0)
### Added
- Travis integration for testing.
- Tests for the new constant loading.
- Tests for the youthguard calculator.
- Classifier `latvian2021`.

### Changed
- Changelog format.
- Moved constants into resource files.
- Rewrote [docs](docs).

### Removed
- Support for PHP < 8.0.

### Fixed
- Improper test case for classifier.

## [0.7.2](https://github.com/GlaivePro/IaafPoints/releases/tag/0.7.2)
- Reduced precision of some tool weights for the Latvian classification for ease of use.

## 0.7.1
- Improved youthguard calculator.

## 0.7.0
- Added calculator for the youthguard combined event.
- Added classifier 'latvian2018'.

## 0.6.3
- Adjusted classifier 'latvian2013'.

## 0.6.2
- Error fixed for women half marathon.

## 0.6.1
- Some error fixing.

## 0.6.0
- Added full latvian2013 classifier.
- Some error fixing.

## 0.5.0
- Added classifier.

## 0.4.0
- Added calculator for combined events.

## 0.3.0
- The 2017 edition of IAAF scoring tables of athletics is fully included.
- Some of the points for combined events might be wrong by one point, take care.

## 0.2.0
- Fixed errors.
- Added some numeric tests.
- Added configuration XML for PHPUnit.

## 0.1.0
- Initial commit.
- Only some of the events are supported.
