export function useUserFeature() {
    const fullName = ref('user test');

    const updateFullName = (newValue: string) => {
        fullName.value = newValue;
    }

    return {
        fullName,
        updateFullName
    }
}

