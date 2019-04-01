import java.util.Collection;
import java.util.Arrays;

public class IterableForEach {

    public static void main(String[] args) {
        Collection<String> c = Arrays.asList("One", "Two", "Three");
        c.forEach(s -> System.out.println(s));
    }
}