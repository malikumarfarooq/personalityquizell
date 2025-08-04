<?php

namespace App\Services;

use App\Models\Result;

class PersonalityAnalysisService
{
    // Personality trait definitions
    protected array $traitDefinitions = [
        'Innovative' => [
            'description' => 'Creative thinker who generates original ideas',
            'image' => 'visionary.jpg',
            'careers' => ['Designer', 'Entrepreneur', 'Artist'],
            'relationships' => 'Thrives in open-minded partnerships',
            'growth' => 'Develop practical implementation skills'
        ],
        'Analytical' => [
            'description' => 'Logical problem-solver who values facts',
            'image' => 'analyst.jpg',
            'careers' => ['Engineer', 'Scientist', 'Data Analyst'],
            'relationships' => 'Prefers intellectually stimulating connections',
            'growth' => 'Cultivate emotional intelligence'
        ],
        'Empathetic' => [
            'description' => 'Warm, caring individual who understands emotions',
            'image' => 'diplomat.jpg',
            'careers' => ['Counselor', 'Teacher', 'Healthcare'],
            'relationships' => 'Creates deep emotional bonds',
            'growth' => 'Develop healthy boundaries'
        ]
    ];

    public function analyze(array $answers): array
    {
        $traits = $this->calculateTraits($answers);

        return [
            'description' => $this->generateDescription($traits),
            'traits' => $traits,
            'image_path' => $this->getImageForTraits($traits),
            'min_score' => $this->calculateMinScore($answers),
            'max_score' => $this->calculateMaxScore($answers)
        ];
    }

    public function generatePremiumContent(Result $result): array
    {
        $traits = $result->traits;

        return [
            'detailed_analysis' => $this->generateDetailedAnalysis($traits),
            'career_paths' => $this->getCareerRecommendations($traits),
            'relationship_insights' => $this->getRelationshipInsights($traits),
            'growth_plan' => $this->createGrowthPlan($traits),
            'sections' => $this->getContentSections()
        ];
    }

    protected function calculateTraits(array $answers): array
    {
        $scores = array_fill_keys(array_keys($this->traitDefinitions), 0);

        // Calculate trait scores based on answers
        foreach ($answers as $answer) {
            if (isset($answer['trait_impact'])) {
                foreach ($answer['trait_impact'] as $trait => $impact) {
                    if (isset($scores[$trait])) {
                        $scores[$trait] += $impact;
                    }
                }
            }
        }

        // Sort traits by score (highest first)
        arsort($scores);

        // Return top 2 traits
        return array_slice(array_keys($scores), 0, 2);
    }

    protected function generateDescription(array $traits): string
    {
        $descriptions = [];
        foreach ($traits as $trait) {
            if (isset($this->traitDefinitions[$trait])) {
                $descriptions[] = $this->traitDefinitions[$trait]['description'];
            }
        }

        return implode('. ', $descriptions) . '.';
    }

    protected function getImageForTraits(array $traits): string
    {
        foreach ($traits as $trait) {
            if (isset($this->traitDefinitions[$trait]['image'])) {
                return 'images/results/' . $this->traitDefinitions[$trait]['image'];
            }
        }

        return 'images/results/default.jpg';
    }

    protected function calculateMinScore(array $answers): int
    {
        return count($answers) * 1; // Minimum possible score
    }

    protected function calculateMaxScore(array $answers): int
    {
        return count($answers) * 5; // Maximum possible score
    }

    protected function generateDetailedAnalysis(array $traits): string
    {
        $analysis = [];
        foreach ($traits as $trait) {
            if (isset($this->traitDefinitions[$trait])) {
                $analysis[] = "As a {$trait} personality: {$this->traitDefinitions[$trait]['description']}";
            }
        }

        return implode("\n\n", $analysis);
    }

    protected function getCareerRecommendations(array $traits): array
    {
        $careers = [];
        foreach ($traits as $trait) {
            if (isset($this->traitDefinitions[$trait]['careers'])) {
                $careers = array_merge($careers, $this->traitDefinitions[$trait]['careers']);
            }
        }

        return array_unique($careers);
    }

    protected function getRelationshipInsights(array $traits): string
    {
        $insights = [];
        foreach ($traits as $trait) {
            if (isset($this->traitDefinitions[$trait]['relationships'])) {
                $insights[] = $this->traitDefinitions[$trait]['relationships'];
            }
        }

        return implode(' ', $insights);
    }

    protected function createGrowthPlan(array $traits): array
    {
        $plan = [];
        foreach ($traits as $trait) {
            if (isset($this->traitDefinitions[$trait]['growth'])) {
                $plan[] = $this->traitDefinitions[$trait]['growth'];
            }
        }

        return $plan;
    }

    protected function getContentSections(): array
    {
        return [
            'detailed_analysis' => [
                'title' => 'Detailed Analysis',
                'icon' => $this->getSectionIcon('detailed_analysis')
            ],
            'career_paths' => [
                'title' => 'Career Recommendations',
                'icon' => $this->getSectionIcon('career_recommendations')
            ],
            'relationship_insights' => [
                'title' => 'Relationship Insights',
                'icon' => $this->getSectionIcon('relationship_insights')
            ],
            'growth_plan' => [
                'title' => 'Growth Plan',
                'icon' => $this->getSectionIcon('growth_roadmap')
            ]
        ];
    }

    protected function getSectionIcon(string $section): string
    {
        $icons = [
            'career_recommendations' => 'briefcase',
            'relationship_insights' => 'heart',
            'growth_roadmap' => 'graph-up',
            'detailed_analysis' => 'search'
        ];

        return $icons[$section] ?? 'info-circle';
    }
}
