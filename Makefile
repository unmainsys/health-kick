# all other values not stored in env files
COVERAGE_LEVEL=70
STORAGE_PATH=$(HOME)/work

# Misc
.DEFAULT_GOAL = help
.PHONY : help test

help: ## Outputs this help screen
	@grep -E '(^[a-zA-Z0-9\./_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'


## Docker related stuff -------------------------------------------------------

ssh: ## Access web container
	@docker exec -it hk-php-fpm bash

docker-up: ## Start project containers (requires password)
	cd $(STORAGE_PATH)/health-kick/_docker/ \
	&& pwd \
	&& bin/set-local-ip-alias.sh \
	&& docker-compose up -d

docker-down: ## Stop project containers
	cd $(STORAGE_PATH)/health-kick/_docker/ \
	&& pwd \
	&& docker-compose down --remove-orphans